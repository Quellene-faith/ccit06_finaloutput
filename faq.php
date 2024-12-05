<!-- FAQs-->
<section class="faq">
  <div class="container">
    <div class="faq-section">    
      <div class="text-center">
        <h2>Frequently Asked Questions</h2>
        <p>If you have any questions, please look through our FAQs below. We’re here to help you!</p>
      </div>

      <!-- Accordion for FAQs-->
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What is your viewing policy?
              </button>
            </h2>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="card-body">
              Our viewing policy allows you to access and enjoy content for a specific period after your purchase or subscription. Please ensure that you have the necessary devices and software to access the content.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How do I track my subscription/viewing progress?
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="card-body">
              You can track your subscription or viewing progress by logging into your account and accessing your viewing history. You will also receive notifications about upcoming content or subscription renewals.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Do you offer international access/viewing?
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="card-body">
              Yes, we offer international access to our content. The availability of content may vary depending on the region. You can check the availability and rates during the sign-up process.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap 5 JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<style>
  /* Hover color change for the accordion button */
  .btn-link:hover {
    background-color: white; /* Change to desired color */
    color: white; /* Text color when hovered */
    text-decoration: none; /* Optional: removes underline */
    border-radius: 4px; /* Optional: adds rounded corners */
  }

  /* Optional: Change the background for expanded items */
  .accordion-button:not(.collapsed) {
    background-color: #007bff; /* Change to desired color */
    color: white;
  }

  /* Hover color change for the dropdown items (if any) */
  .dropdown-item:hover {
    background-color: white; /* Change to desired color */
    color: white;
  }
</style>
