
  <script src="{{asset('web/js.auth-state.js')}}"></script>
  <script src="{{asset('web/js/script.js')}}"></script>
   <script src="{{asset('web/js/planner-catalog.js')}}"></script>
    <!-- <script src="{{asset('web/js/planners.js')}}"></script> -->
      <script src="{{asset('web/js/inner-pages.js')}}"></script>
      <!-- <script src="{{asset('web/js/planner-details.js')}}"></script> -->
       <script>
        const contactForm = document.getElementById("contactForm");

contactForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const name =
        contactForm.elements.name.value.trim().split(" ")[0] || "there";

    const submitButton = contactForm.querySelector(
        "button[type='submit']"
    );

    const originalContent = submitButton.innerHTML;

    submitButton.disabled = true;
    submitButton.textContent = "Sending…";

    try {
        const response = await fetch(contactForm.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'input[name="_token"]'
                ).value,
                "Accept": "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams(new FormData(contactForm)),
        });

        const data = await response.json();

        if (response.ok) {
            contactForm.reset();

            showToast(
                `Thank you, ${name}! Your enquiry has been submitted successfully.`
            );
        } else {
            showToast("Something went wrong. Please try again.");
        }

    } catch (error) {
        console.error(error);
        showToast("Something went wrong. Please try again.");

    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = originalContent;
    }
});
        </script>