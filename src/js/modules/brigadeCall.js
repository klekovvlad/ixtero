export const BrigadeCall = () => {
    const BrigadeItems = document.querySelectorAll('.brigade-item');

    if(BrigadeItems.length > 0) {
        BrigadeItems.forEach(item => {
            const button = item.querySelector('.brigade-call');
            button.onclick = () => {
                if(!item.classList.contains('contacts-open')) {
                    item.classList.add('contacts-open');
                    ShowContacts(item);
                }
            }
        })
    }
}

const ShowContacts = (wrapper) => { 
    const title = wrapper.querySelector('.title');
    const city = wrapper.querySelector('.city');
    const img = wrapper.querySelector('.brigade-item-img');
    const phone = wrapper.dataset.phone;

    const contacts = document.createElement('div');
    contacts.classList.add('brigade-contacts');

    const contactsClose = document.createElement('div');
    contactsClose.classList.add('close');
    contactsClose.innerHTML = '<span></span><span></span>';

    const contactsWrapper = document.createElement('div');
    contactsWrapper.classList.add('info');

    const contactsName = document.createElement('div');
    contactsName.classList.add('title');
    contactsName.textContent = title.textContent;

    const contactsCity = document.createElement('div');
    contactsCity.classList.add('city');
    contactsCity.textContent = city.textContent;

    let contactsPhone = null;
    if(phone !== '') {
        contactsPhone = document.createElement('a');
        contactsPhone.href = `tel:${phone}`;
        contactsPhone.textContent = phone;
    }else{
        contactsPhone = document.createElement('div');
        contactsPhone.textContent = 'Телефон не указан';
    }
    contactsPhone.classList.add('phone');

    let contactsImg;
    if(img) {
        contactsImg = document.createElement('img');
        contactsImg.classList.add('contact-img');
        contactsImg.src = img.src;
        contactsImg.alt = img.alt;
    }

    contactsWrapper.append(contactsName, contactsCity, contactsPhone);
    if(contactsImg) {
        contacts.append(contactsClose, contactsImg, contactsWrapper);
    }else {
        contacts.append(contactsClose, contactsWrapper);
    }
    wrapper.append(contacts);

    setTimeout(() => {
        contacts.classList.add('open');
    }, 100);

    wrapper.onclick = (e) => {
        if(e.target === wrapper || e.target === contactsClose) {
            wrapper.classList.remove('contacts-open');
            HideElement(contacts);
        }
    }

    setTimeout(() => {
        HideElement(contacts)
    }, 20000);
}

const HideElement = (el) => {
    el.classList.remove('open');
    setTimeout(() => {
        el.parentNode.removeChild(el);
    }, 500)
}