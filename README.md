# Secure Programming and Penetration Testing

This is an attempt to modernize the pentesting class that we take at UNCC. I will be using more modern tools such as docker and vagrant to be able to ensure that the lab environment that we setup and utilize is uniformed. These tools were created for such purpose, why not use them in the classroom?

## Requirements
* docker
* vagrant
* virtualbox

## Format

This will develop as the year goes along, but till then it should be

```
.
├── classes
│   └── 20180111
│       ├── xssEncode.php
│       └── xss-example.js
├── mutillidae
│   └── 00-setup_and_use
│       └── Vagrantfile
├── notes-environment
├── README.md
└── web-dir
    ├── index.html
    └── xssEncode.php
```

### Classes

This will contain the different things that we did each class (i.e. commands used during each class, files used, etc...)

### Mutillidae

This will cover all the different mutillidae quiz information (i.e. commands used during each quiz, files used, etc...)

### Web-dir

This is the folder that we will mount when we are using the lamp stack to the `/var/www/example.com/public_html/` directory which is the active directory for the lamp stack that gets served up.

#### README.md
I shall try to put a README.md in each folder to help describe what to do and how to do it for each folder.

#### Vagrantfile
I will try to include a Vagrantfile for each mutillidae excercise to make sure all the configuration is done properly
