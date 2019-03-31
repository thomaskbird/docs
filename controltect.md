## safeInvoke
There are times we won't be sure that a function is set or ready for use, we can utilize safe invoke to test the function until it is set and ready to be used then execute the function.

## General notes
- Anytime you are adding an api to a component, initialize the api in the constructor of the component

## App package update
- https://jira.it.control-tec.com:8443/browse/PDSWEBAPP-710
- Install this globally: https://www.npmjs.com/package/npm-check-updates
- Then run “ncu” in the project root
  - It will produce a report of all dependencies that are outdated, and conveniently highlight the differences to show whether they are patch, minor, or major updates ncu has options to automatically update the package.json to apply all upgrades, but I never do that because I want to be in more control
- I usually start with manually updating the package json with all patch-level updates, npm install, run precommit to verify nothing broke patch updates are usually safe enough that that’s enough verification, but depending on the package, I may investigate what was fixed by the patches to see if it affects us that just requires awareness of what each package is and whether we may be affected by any bugs that may be fixed for many packages, you can find release notes on the project’s github page. I usually commit the patch updates at that point and move on to minor version updates depending on the package, I investigate release notes before applying the upgrade to determine whether we might want to changehow we use it, or generally become aware of new features
- Minor version updates are also usually pretty safe… apply them, run precommit

- Major version upgrades definitely require investigation into release notes, migration guides, etc., to determine how simple the upgrade is decide whether to try the upgrade, make necessary changes, thoroughly manually test in addition to precommit if any particular package can not be easily upgraded, write a separate JIRA for upgrading that package that explains why it’s not a trivial upgrade, any notes about what it takes to upgrade it, links to release notes and/or migration guides, etc
  - Be aware that @types/ packages versions mys be in sync with the version of the corresponding package never upgrade a @types package to a higher major.minor version than the package itself and finally, 
  - Before creating a PR, do some manual testing requires being aware of how the various upgraded packages are most likely to impact our project to decide what to thoroughly test which may include testing a production build of the web app if there are any substantial upgrades to packages related to webpack or any of the webpack plugins we use
- while working on NPM upgdates, I usually add comments to the JIRA with any interesting/relevant info I discover about any of the upgraded packages, or notes about what changes to our project were necessary to apply the upgrade