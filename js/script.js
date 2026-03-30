document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("postForm");
  const clearBtn = document.getElementById("clearBtn");


  if (form) {
    form.addEventListener("submit", (e) => {
      const title = document.getElementById("title");
      const content = document.getElementById("content");
      let isValid = true;

 
      title.classList.remove("error");
      content.classList.remove("error");


      if (!title.value.trim()) {
        title.classList.add("error");
        isValid = false;
      }

      if (!content.value.trim()) {
        content.classList.add("error");
        isValid = false;
      }

      
      if (!isValid) {
        e.preventDefault();
        alert("Please fill out both the Title and Content fields.");
      }
    });
  }


  if (clearBtn) {
    clearBtn.addEventListener("click", (e) => {
      const confirmed = confirm("Are you sure you want to clear the form?");
      if (!confirmed) {
        e.preventDefault();
      } else {
      
        form.reset();
        document.getElementById("title").classList.remove("error");
        document.getElementById("content").classList.remove("error");
      }
    });
  }
});
