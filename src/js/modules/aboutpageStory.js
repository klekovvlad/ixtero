export const AboutpageStory = () => {
    const storySection = document.querySelector('.aboutpage-story');
    if(storySection) {
        const wrapper = storySection.querySelector('.story-items');
        const items = storySection.querySelectorAll('.story-item');
        const button = storySection.querySelector('.story-button');
        let h = wrapper.offsetHeight;
    
        for(let i = 0; i < 3; i++) {
            h = h - items[i].offsetHeight
        }
    
        wrapper.style.height = `${h}px`;
    
        button.onclick = (e) => {
            openStory(e.target, wrapper, h)
        }
    }
}

const openStory = (target, wrapper, h) => {
    if(wrapper.classList.contains('open')) {
        target.style.transform = 'rotate(0deg)'
        wrapper.style.height = `${h}px`;
        wrapper.classList.remove('open')
    }else{
        wrapper.classList.add('open');
        target.style.transform = 'rotate(180deg)'
        wrapper.style.height = '100%'
    }
}