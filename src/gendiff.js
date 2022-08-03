let j1 = {
    "host": "hexlet.io",
    "timeout": 50,
    "proxy": "123.234.53.22",
    "follow": false
};

const keys = [...Object.keys(j1), ...Object.keys(j2)];

let res = '';

let j2 = {
    "timeout": 20,
    "verbose": true,
    "host": "hexlet.io"
};

for (let key of new Set(keys.sort())) {
    if (j1[key] && j2[key]) {
        if (j1[key] === j2[key]) {
            console.log('   ', key, ': ', j1[key]);
        } else {
            console.log(' - ', key, ': ', j1[key]);
            console.log(' + ', key, ': ', j2[key]);
        }
    } else if (!j1[key] && j2[key]) {
        console.log(' + ', key, ': ', j2[key]);
    } else {
        console.log(' - ', key, ': ', j1[key]);
    }
};
