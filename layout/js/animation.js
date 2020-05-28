var str = document.querySelector('.titleH');
const strtext = str.textContent;
const splittext = strtext.split("");
str.textContent = "";
for (let i = 0; i < splittext.length; i++) {
    str.innerHTML += "<span class=animation>" + splittext[i] + "</span>";
}
let char = 0;
let timer = setInterval(() => {
    const span = str.querySelectorAll('.animation')[char];
    span.classList.add('fade');
    char++;
    if (char === splittext.length) {
        complete();
        return;
    }
}, 50);

function complete() {
    clearInterval(timer);
    timer = null;

}