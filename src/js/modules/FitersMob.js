export const AddFilterButton = () => {
    const shopPage = document.querySelector('.shoppage');

    if(shopPage && window.innerWidth < 768) {
        
        const button = document.createElement('button')
        button.className = 'filter-button';
        button.textContent = 'Фильтры';

        document.querySelector('.wcpf-filter').before(button);

        button.addEventListener('click', () => {
            document.querySelector('.wcpf-filter').style.top = `${button.offsetTop + button.offsetHeight}px`
            if(document.querySelector('.wcpf-filter').classList.contains('open')) {
                document.querySelector('.wcpf-filter').classList.remove('open')
                button.classList.remove('open')
            }else {
                document.querySelector('.wcpf-filter').classList.add('open')
                button.classList.add('open')
            }
        })

        document.querySelectorAll('.wcpf-button').forEach(btn => {
            btn.onclick = () => button.classList.remove('open')
        })
    }
}