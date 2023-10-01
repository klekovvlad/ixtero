export const Popups = () => {
    const popups = document.querySelectorAll('.popup');

    if(popups.length > 0) {
        const popupButtons = document.querySelectorAll('.popup-open');
        
        popupButtons.forEach(button => {
            button.onclick = (e) => {
                e.preventDefault();

                popups.forEach(popup => {

                    let buttonClasses = [...button.classList];
                    let popupClasses = [...popup.classList];

                    let classFilter = buttonClasses.filter(value => popupClasses.includes(value));

                    if(classFilter.length > 0) {
                        let popupName = null;

                        classFilter.forEach(n => {
                            popupName = n;
                        })

                        if(popup.classList.contains(popupName)) {
                            popup.classList.add('open');
                            popup.onclick = (e) => {

                                if(e.target === popup || e.target.classList.contains('close')) {
                                    popup.classList.remove('open');
                                }

                            }
                        }
                    }
                
                })
                

            }
        })
    }
}