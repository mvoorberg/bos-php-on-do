{
"title" : "Tilde vs Caret in Package.json",
"author":"Mark Voorberg",
"tag":"How-To",
"category":"Software Development",
"meta-description": "Introduce Semantic Versioning and explain how the different pattern matching applies when updating packages in a NodeJS project."
}


Before we get to the details of tilde and caret, we should at least cover the basics of Semver. Semver is short for "Semantic Versioning", it is used as a versioning scheme for software projects.

At it's most basic, it follows the following format:
```
MAJOR.MINOR.PATCH
```
#### Major
Major change versions may include breaking changes from a previous version. If a feature is to be dropped or no longer supported, it should be a major version change.

#### Minor
Minor change versions can include new features or an expansion of functionality. Any existing functions should work as they did before, even if their internals have changed. Minor version changes should be backwartds compatible.

#### Patch
Patch versions generally only include small bug fixes or performance improvements etc.

#### Beta
For pre-released software it may include a pre-release version indicator:
```
MAJOR.MINOR.PATCH-beta.BETA
```
Where the `-beta` string may be anything useful.

* 1.2.3-beta.2
* 1.2.3-pre.2

Keep in mind that major, minor and patch version numbers are not base 10, so it's completely valid to have version number that look like:

* 1.6.17
* 5.76.103

Don't expect that version 1.2.1 and 1.2.10 are equivalent!
 
#### Package.json
When a semver version is used in a package.json file, it indicates how NPM (or Yarn) will apply updates to the project dependencies.

### Tilde(~) == Patch versions
`~version` will update you to all future __patch versions__, without incrementing the minor version. 

~1.2.3 will use releases from 1.2.3 to <1.3.0

### Carat(^) == Minor and Patch versions
`^version` will update you to all future __minor/patch versions__, without incrementing the major version. 

^2.3.4 will use releases from 2.3.4 to <3.0.0.

### Asterisk(*) == Match any version
`*version` will update you to __all future versions__, including major versions. It's generally not recommended as it will leave you open ito installing breaking changes. 

<table>
<thead>
<tr><th>Value</th><th>Description</th></tr>
</thead>
<tbody>
<tr>
<td><code>~version</code></td>
<td>Approximately equivalent to version, i.e., only accept new <strong>patch</strong> versions</td>
</tr>
<tr>
<td><code>^version</code></td>
<td>Compatible with version, E.g. matching new <strong>minor and patch</strong> versions </td>
</tr>
<tr>
<td><code>*version</code></td>
<td>All versions, E.g. matching new <strong>major, minor and patch</strong> version changes </td>
</tr>
<tr>
<td><code>version</code></td>
<td>Must match version exactly</td>
</tr>
<tr>
<td><code>&gt;version</code></td>
<td>Must be greater than version</td>
</tr>
<tr>
<td><code>&gt;=version</code></td>
<td>Must be greater than or equal to version</td>
</tr>
<tr>
<td><code>&lt;version</code></td>
<td>Must be less than version</td>
</tr>
<tr>
<td><code>&lt;=version</code></td>
<td>Must be less than or equal to version</td>
</tr>
<tr>
<td><code>1.2.x</code></td>
<td>1.2.0, 1.2.1, etc., but not 1.3.0</td>
</tr>
<tr>
<td><code>*</code></td>
<td>Match any version</td>
</tr>
<tr>
<td><code>latest</code></td>
<td>Matching the latest release</td>
</tr>
</tbody>
</table>


## Conclusion
When consuming (or more importanty, maintaining) libraries it's critical to understand the Semver rules and how they are interpreted for your particular use case. Using the wrong match pattern can result in breaking changes in both development projects and when deploying your software to production. 

Following the Semver rules and maintaining good practices is essential if we are going create reliable software for ourselves and our clients.


