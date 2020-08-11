document.addEventListener('DOMContentLoaded', function() {
    const selects = document.querySelectorAll('select');
    M.FormSelect.init(selects);
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
});
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
});
