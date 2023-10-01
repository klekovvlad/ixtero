export const SetCities = () => {
    if(localStorage.getItem('cityId') === undefined || localStorage.getItem('cityId') === null) {
        localStorage.setItem('cityId', 0)
    }
}