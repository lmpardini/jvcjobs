let doc = $(document).height();
let win = $(window).height();
const footer = document.getElementById("rodape");

if (doc > win) {
    footer.classList.remove("fixed-bottom");
} else {
    footer.classList.add("fixed-bottom");
}

