# Squoosh CLI

### Requirements
1. Requires Node 16

### Installation
`npm i -g @squoosh/cli`

### Converting a single image
`squoosh-cli --mozjpeg '{ quality: 60, lossless: 1, smoothing: 25 }' <FILE> -d output`

### Converting an entire directory
`squoosh-cli --mozjpeg '{ quality: 60, lossless: 1, smoothing: 25 }' -d output *`