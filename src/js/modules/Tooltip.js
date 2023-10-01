export const Tooltip = () => {
    const tooltips = document.querySelectorAll('.tooltip');
    if(tooltips.length > 0) {
        tooltips.forEach(tooltip => {
            const tooltipValue = tooltip.querySelector('.tooltip-value');
            const tooltipItems = tooltip.querySelectorAll('.tooltip-item');

            tooltipValue.onclick = () => {
                OpenTooltip(tooltip);
            }

            tooltipItems.forEach(item => {
                if(localStorage.getItem('cityId') == item.dataset.id) {
                    tooltipValue.textContent = item.textContent;
                    item.classList.add('tooltip-item__active');
                }else{
                    item.classList.remove('tooltip-item__active');
                }
                item.onclick = (e) => {
                    TooltipActions(e.target);
                }
            })
        })
    }
}

const OpenTooltip = (element) => {
    element.classList.contains('open') ? element.classList.remove('open') : element.classList.add('open');
}

const TooltipActions = (target) => {
    if(!target.classList.contains('tooltip-item__active')) {
        localStorage.setItem('cityId', target.dataset.id);
        location.reload();
    }
}