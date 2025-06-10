{
"title" : "Deploy App to iOS Device from archive file",
"author":"Mark Voorberg",
"tag":"How-To",
"category":"Software Development",
"meta-description": "Installing an ios build without waiting for testflight."
}


While developing apps for iPhone, you typically do development on simulators or USB connected devices. When you go to publish your app to TestFlight, there's some 'processing' time before you can go about installing it on a real phone. It doesn't take long before you run into a scenario where the simulator behaves differently than the deployed app. In my experience, this is true for a usb connected device as well.

Thankfully there's a way to deploy the built version of your app directly to a connected device avoiding the pasky wait and allowing you to get a more realistic app experience. 

Here are the steps.

1. Create the "Archive" for the app as if you were going to publish it
2. When archiving is complete, click "Show in finder" and locate the "<date-time>.xcarchive" file created in step #1
3. Click on the .xarchive file and select "Show Package Contents"
4. In the opened folder, select "Products –> Application" and you will see your application (with a marked-up icon)
5. Connect your device with a USB cord
6. In XCode, open "Window -> Devices and Simulators", select "Devices" and choose your device
7. Drag the app from Finder to the "Installed Apps" section to install it to the device

When the proverbial dust clears, you will have installed the same build of your app that would be available in TestFlight if you choose to distribute it.

### Wrap-up
It took me a couple times before I went looking for this solution but this is much quicker than waiting for a notification that my app is ready for testing. I can try things much faster this way!