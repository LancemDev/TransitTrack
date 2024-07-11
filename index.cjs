const jsonfile = require('jsonfile');
const moment = require('moment');
const mathRandom = require('math-random');
const simpleGit = require('simple-git')();
const FILE_PATH = './data.json';

const randomInt = (min, max) => {
    return Math.floor(mathRandom() * (max - min + 1)) + min;
};

const makeCommit = async (n) => {
    if (n === 0) {
        try {
            await simpleGit.push();
        } catch (err) {
            console.error('Error pushing to git:', err);
        }
        return;
    }

    const x = randomInt(0, 6);
    const y = randomInt(0, 7);

    const DATE = moment().subtract(6, 'w').add(x, 'w').add(y, 'd').format();
    const data = { date: DATE };
    console.log(DATE);

    jsonfile.writeFile(FILE_PATH, data, (err) => {
        if (err) {
            console.error('Error writing to file:', err);
            return;
        }
        simpleGit.add([FILE_PATH])
            .then(() => simpleGit.commit('Commit new changes', { '--date': DATE }))
            .then(() => makeCommit(n - 1))
            .catch((err) => {
                console.error('Error during git operation:', err);
            });
    });
};

makeCommit(50);
