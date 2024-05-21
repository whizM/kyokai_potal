const textarea = document.getElementById("textarea");
const charCount = document.getElementById("charCount");

textarea.addEventListener("input", function() {
  const text = textarea.value;
  const maxLength = parseInt(textarea.getAttribute("maxlength"));
  const remaining = maxLength - text.length;
  charCount.textContent = `${text.length} / ${maxLength}`;
  
  if (remaining < 0) {
    charCount.style.color = "red"; // Change color to indicate character limit exceeded
  } else {
    charCount.style.color = ""; // Reset color
  }
});