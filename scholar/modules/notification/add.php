
<button class="btn btn-success" id="return_to_main" type="submit" name="return">Print this receipt</button>

<div class="print_reciept" id="print_reciept" style="width: 800px;">

<!DOCTYPE html>
<html>
<head>
  <title>Printable Page with Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    @media print {
      body {
        padding: 20px;
      }
    }
  </style>
</head>

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <section class="printable-section">
            <h2>Column 1</h2>
            <p>This is the content of column 1.</p>
          </section>
        </div>

        <div class="col-md-6 col-lg-4">
          <section class="printable-section">
            <h2>Column 2</h2>
            <p>This is the content of column 2.</p>
          </section>
        </div>

        <div class="col-md-6 col-lg-4">
          <section class="printable-section">
            <h2>Column 3</h2>
            <p>This is the content of column 3.</p>
          </section>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4">
          <section class="printable-section">
            <h2>Column 4</h2>
            <p>This is the content of column 4.</p>
          </section>
        </div>

        <div class="col-md-6 col-lg-4">
          <section class="printable-section">
            <h2>Column 5</h2>
            <p>This is the content of column 5.</p>
          </section>
        </div>

        <div class="col-md-6 col-lg-4">
          <section class="printable-section">
            <h2>Column 6</h2>
            <p>This is the content of column 6.</p>
          </section>
        </div>
      </div>

      <!-- Add more rows as needed -->
    </div>
  </main>


</div>



<script>
    const button = document.getElementById('return_to_main');

    function generatePDF() {
        const element = document.getElementById('print_reciept');
        html2pdf().from(element).save();
        // document.getElementById("return_to_main").style.display ="block";
    }

    button.addEventListener('click', generatePDF);
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>