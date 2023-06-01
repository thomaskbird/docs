# Setting up firebase

## Creating firebase project
1. Go to `https://console.firebase.google.com/`
2. Create a project
3. Follow the on screen direction and create a new project
4. Once done, go to the `Project settings` and down to the `Your apps` section
5. Click `Add app`, click on the code icon for `Web app`
6. Add a nick name and click on `Register app`

## Install firebase into your projects code
1. After run the following command `yarn add firebase`
2. Then add the following config

```
// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "<API_KEY>",
  authDomain: "<AUTH_DOMAIN>",
  projectId: "<PROJECT_ID>",
  storageBucket: "<STORAGE_BUCKET>",
  messagingSenderId: "<MESSAGE_SENDER_ID>",
  appId: "<APP_ID>"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
```
3. Make sure to properly set your `connect-src` correctly in your CSP's `cspSettings` object. Example:

```
{
    'connect-src': ["'self'", 'ws://localhost:*', 'https://firestore.googleapis.com'],
}
```

4. Ensure that you allow firestore rules to be read and write change the following from:

```js
rules_version = '2';

service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read, write: if false;
    }
  }
}
```

to

```js
rules_version = '2';

service cloud.firestore {
  match /databases/{database}/documents {
    match /{document=**} {
      allow read, write: if true;
    }
  }
}
```

## Deploy your app
1. Sign into Google: `firebase login`
2. Initialize your project `firebase init`
3. Deploy your app `firebase deploy`
