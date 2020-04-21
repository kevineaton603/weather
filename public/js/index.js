
const cDiv = document.getElementById('temp-measure-c');
const fDiv = document.getElementById('temp-measure-f');
const tempDiv = document.getElementById('temp');
const feelsLikeDiv = document.getElementById('feels_like');
const tempMaxDiv = document.getElementById('temp_max');
const tempMinDiv = document.getElementById('temp_min');

const tempDivs = [tempDiv, feelsLikeDiv, tempMinDiv, tempMaxDiv];

/**
 * 
 * @param {*} weather Weather Object from Open Weather Data
 * @param {string} measurement unit of measurement to convert to
 */
const convert = (weather, measurement) => {
    const {temp, feels_like, temp_min, temp_max} = weather.main;
    let temp_arr = [temp, feels_like, temp_min, temp_max];
    temp_arr = converter(temp_arr, measurement);

    for(let i = 0; i < temp_arr.length; i++){
        tempDivs[i].innerHTML = `${temp_arr[i]} &#870; ${measurement}`;
    }

}

/**
 * 
 * @param {number[]} temp 
 */
const converter = (temp, measurement) => {
    let convert = x => x;
    switch (measurement) {
        case 'F':
            convert = ktof;
            break;
        case 'C':
            convert = ktoc;
            break;
    
        default:
            break;
    }
    return temp.map(convert);
}

/**
 * 
 * @param {number} x degrees in kelvins
 */
const ktof = (x) => {
    x -= 273.15;
    x = x * 9 / 5;
    x += 32;
    return x.toFixed(2);
};

/**
 * 
 * @param {number} x degrees in kelvins
 */
const ktoc = x => (x - 273.15).toFixed(2);