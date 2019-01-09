Theme for the Gathering Places Omeka site.
[https://liblamp.uwm.edu/omeka/gatheringplaces/](https://liblamp.uwm.edu/omeka/gatheringplaces/)

## File Structure


### `src`
Working files are all located in the `src` directory. Changes to the sass or theme files should be done here. Gulp is responsible for compiling and moving those files where they need to go.

### `dist`

The dist file is there to create an exportable version of the theme to upload to a remote server.

### `omeka`

Omeka should be installed into a folder called `omeka`. In my local setup, I installed it into a folder with the version number (ex: `omeka-2.6.1`)

## Local Development

Working on the theme locally requires that you have [node.js](https://nodejs.org/en/) installed on your system.

1. Clone git repository.
2. `cd` into directory.
3. Create a new directory called `omeka` and install [Omeka Classic](https://omeka.org/classic/) there (this theme was developed with v2.6).
4. Run `npm install`
5. Run `gulp` to start watching the Sass and theme files for changes.
