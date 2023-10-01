import IMask from "imask";

export const PhoneMask = () => {
    const phones = document.querySelectorAll('input[type=tel]')
    
    if(phones.length > 0) {
        phones.forEach(phone => {
            let phoneMask = IMask(
            phone, {
                mask: '+{7}(000)000-00-00'
            });
        })
    }
}