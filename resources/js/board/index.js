function getBoardUrl(value) {
    location.href=value;
}


$('#boardSelect').on('change', function() {
    location.href = this.value;
})