 function generatePDF(){
        let invoice = document.getElementById("content-page");

        html2pdf()
        .from(invoice)
        .save();

    }