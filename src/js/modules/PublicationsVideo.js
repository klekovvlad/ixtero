import Plyr from "plyr";

export const PublicationsVideo = () => {
    const videoItems = document.querySelectorAll('.video-item');

    if(videoItems.length > 0) {
        videoItems.forEach(video => {

            video.onclick = (e) => {
                RenderPopup(e.target);
            }

        })
    }
}

const RenderPopup = (target) => {
    
    const videoPopup = document.createElement('div');
    const videoBody = document.createElement('div');
    videoPopup.className = 'popup popup-video';
    videoBody.classList.add('video-body');

    setTimeout(() => {
        videoPopup.classList.add('open');
    }, 100);

    let videoContent = null;
    
    if(target.dataset.video) {
        videoContent = document.createElement('video');
        videoContent.src = target.dataset.video;
        videoContent.type = 'video/mp4';
    }else if(target.dataset.youtube) {
        videoContent = document.createElement('iframe');
        videoContent.src = target.dataset.youtube;
        videoContent.allowfullscreen = true;
        videoContent.allowtransparency = true;
        videoContent.allow = 'autoplay'
    }

    videoContent.classList.add('video-content');
    videoBody.append(videoContent);
    videoPopup.append(videoBody);    
    document.querySelector('body').append(videoPopup);
    // videoPopup.insertAdjacentHTML('afterbegin', '<div class="close"><span></span><span></span></div>')
    if(target.dataset.video) {
        const Player = new Plyr(videoContent);
    }else {
        const Player = new Plyr(videoBody);
    }

    videoPopup.onclick = (e) => e.target.classList.contains('popup-video') ? videoPopup.parentNode.removeChild(videoPopup) : null;
}