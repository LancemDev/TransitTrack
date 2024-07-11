const jsonfile = require('jsonfile');
const moment = require('moment')
const simpleGit = require('simple-git')
const FIlE_PATH = './data.json';

const DATE = moment().format();

const data = {
    date: DATE
}

jsonfile.writeFile(FIlE_PATH, data)

// git commit --date = "certain date"
simpleGit().add([FIlE_PATH]).commit(DATE, {'--date' : DATE}).push();