{
"title" : "Implementing MSAL Authentication in Ionic",
"image" : "2020-06-03-implementing-msal-authentication-ionic.jpg",
"author" : "Wiebo Troost",
"date" : "03-06-2020",
"tag" : "Best Practices",
"category" : "Software Development",
"slug" : "implementing-msal-authentication-ionic",
"meta-description": "Implementing MSAL Authentication in Ionic"
}

Microsoft has been recommending MSAL over ADAL for authenticating users on Azure AD as far back as 2017. The official `azure-activedirectory-library-for-cordova` project has been on ice since October of 2018 and developers targeting AzureAD with Ionic native apps have been largely left out in the cold. Until recently, Ionic native developers did not have a free and open source MSAL plugin available. Fortunately, that has now changed.

####Adal vs MSAL
Microsoft currently publishes 2 sets of endpoints for AzureAD authentication. The version 1 endpoints use Adal for authentication, whereas the version 2 endpoints use Msal. In general you should use Msal, and only use Adal if you need to use Active Directory Federation Services (ADFS).
Msal has many benefits, including an improved security configuration that includes the validation of the application's certificate. Ionic developers now have the option of using Msal and no longer need to rely on a deprecated Adal plugin.

####The MSAL native Plugin 
Thanks to the <a href="https://www.npmjs.com/package/cordova-plugin-msal" target="_blank">cordova-plugin-msal</a> and the accompanying 
<a href="https://www.npmjs.com/package/ionic-msal-native" target="_blank">ionic-msal-native</a> wrapper, Msal can now easily be implemented in Ionic apps.

The installation of the cordova plugin requires a few steps.
In Azure AD, you'll need to create your app registration. On the App's overview page you'll be able to collect your Tenant ID and your Client ID, both of which are needed for the install. Finally, you need to generate a hash from the android keystore. You can find your `debug.keystore` file in the `.android` folder of your project. As <a href="https://www.npmjs.com/~wrobins" target="_blank">wrobins</a> explains in the `cordova-plugin-msal` documentation, the hash can then be generated as follows:
```bash
keytool -exportcert -alias yourkeystorealias -keystore path/to/your/keystore/file.keystore | openssl sha1 -binary | openssl base64
```

With the Tenant ID, the Client ID and the keystore hash, you can now install the cordova plugin:

```bash
ionic cordova plugin add cordova-plugin-msal --variable TENANT_ID=your-tenant-guid-here --variable CLIENT_ID=your-client-guid-here --variable KEY_HASH=your-keytor-hash-here
```

The Ionic wrapper installation is simply done with:
```bash
npm install ionic-msal-native
```

####Final Azure Setup
In order for the MSAL authentication on Android to work, you'll need to access the `Authentication` option of the registered app, and add the Android platform. This results in a `redirect_url` in the form of:
```
msauth:\\<package-name>\<keystore_hash>
```
The package name is the value you have configured in `config.xml` as the `widget.id`.

When you're creating the signed APK of your app, the production keystore file will be created. It can then be used to generate another hash, which in turn can be used to configure the production redirect_url of your app.


#####Authenticating in Ionic
With both the cordova plugin and the ionic native wrapper installed, you can now obtain an Msal reference in your component or service, by simply injecting it into the component constructor:

```javascript
constructor(private msal: Msal) { }
```
Logging in is now as easy as initializing and calling the appropriate sign in method:

```javascript
const options: any = {
  authorities: [
    {
      type: 'AAD',
      audience: 'AzureADMultipleOrgs',
      authorityUrl: "https://login.microsoftonline.com/organizations",
      default: true
    }
  ], 
  scopes: ['User.Read']
};

this.msal.msalInit(options).then((initResult) => {
    console.log("Success result:", initResult); // "OK"
    return initResult;
  },
  (err) => {
    console.log("Error result:", err);
  })
  .then(() => {
    return this.msal.signInInteractive();
  })
  .then((jwt) => {
    console.log("Signin result:", jwt);
  });
```

Getting authenticated with AzureAD has never been easy, but hopefully the `ionic-msal-native` wrapper makes it a tiny bit simpler!
If you want to see how the wrapper came together, or submit a PR, find the [repo on Github](https://github.com/binaryops-wiebo/ionic-msal-native). 


