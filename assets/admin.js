// Copy to clipboard function
function acf7a_copyToClipboard(elementId) {
    var text = document.querySelector(elementId).textContent;
    var tempInput = document.createElement('input');
    document.body.appendChild(tempInput);
    tempInput.value = text;
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    alert('Copied: ' + text);
}

// Optional: Attach click event to all buttons with class .acf7a-copy-btn
document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.acf7a-copy-btn');
    buttons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var targetId = btn.getAttribute('data-target');
            if(targetId) acf7a_copyToClipboard(targetId);
        });
    });
});
