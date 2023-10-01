export const commentRating = (page) => {
    const rating = page.querySelector('.comment-form > .comment-rating');
    const stars = rating.querySelectorAll('.comment-star');
    rating.onmousemove = (e) => {

        if(e.target.dataset.rating) {
            for(let i = 0; i < stars.length; i++) {
                stars[i].classList.remove('active');
            }
            for(let i = 0; i < e.target.dataset.rating; i++) {
                stars[i].classList.add('active')
            }
        }

    }

    rating.onmouseleave = () => {
        for(let i = 0; i < stars.length; i++) {
            stars[i].classList.remove('active');
        }
    }

    rating.onclick = () => {
        rating.onmousemove = () => {
            return false;
        }
        rating.onmouseleave = () => {
            return false;
        }
    }
}