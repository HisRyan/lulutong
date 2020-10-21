var serviceDOM = document.querySelector('.service');
var menuDOM = document.querySelector('.menu');
var flag = 0;
serviceDOM.addEventListener('click', function () {
    if (flag == 0) {
        menuDOM.style.display = "block";
        flag = 1;
    } else {
        menuDOM.style.display = "none";
        flag = 0;
    }
})