// JQUERY GET STARTED
$(document).ready(function() {
    // All jQuery code goes here

    // JQUERY SYNTAX
    $("#changeTextBtn").on("click", function() {
        var newText = $("#newTextInput").val();
        if (newText.trim() !== "") {
            var oldText = $("#jqueryText").text();
            $("#jqueryText").text(newText);
            $("#newTextInput").val(""); // Clear the input after use
            
            // Menambahkan perubahan ke riwayat
            $("#textHistoryList").prepend("<li>" + oldText + " → " + newText + "</li>");
        } else {
            alert("Silakan masukkan teks baru terlebih dahulu!");
        }
    });

    // Log untuk debugging
    console.log("jQuery version:", $.fn.jquery);
    console.log("Change Text Button:", $("#changeTextBtn").length);
    console.log("jQuery Text Element:", $("#jqueryText").length);

    // JQUERY SELECTOR (ELEMENT)
    $("button").css("cursor", "pointer");

    // JQUERY SELECTOR (#ID)
    $("#searchBtn").click(function() {
        var searchTerm = $("#bookSearch").val().toLowerCase();
        var selectedDate = $("#datepicker").val();
        
        // Simulated book data (replace with actual data or API call)
        var books = [
            { title: "Harry Potter", author: "J.K. Rowling", date: "2023-05-15" },
            { title: "The Great Gatsby", author: "F. Scott Fitzgerald", date: "2023-06-20" },
            { title: "To Kill a Mockingbird", author: "Harper Lee", date: "2023-07-10" }
        ];
        
        var results = books.filter(function(book) {
            return book.title.toLowerCase().includes(searchTerm) && 
                   (!selectedDate || book.date === selectedDate);
        });
        
        displayResults(results);
    });

    // JQUERY SELECTOR (.CLASS)
    $(".custom-column").addClass("shadow");

    // JQUERY EVENTS
    $("#toggleBtn").on("click", function() {
        $("#hideShowDiv").toggle();
        console.log("Toggle button clicked"); // For debugging
    });

    // JQUERY EFFECT
    $("#searchBtn").hover(
        function() {
            $(this).fadeTo("fast", 0.7);
        },
        function() {
            $(this).fadeTo("fast", 1);
        }
    );

    // JQUERY ANIMATE
    var isFirstAnimation = true;
    $("#animateBtn").click(function() {
        if (isFirstAnimation) {
            $("#animateDiv").animate({
                width: "200px",
                height: "200px",
                opacity: 0.5,
                backgroundColor: "#ff9900"
            }, 1000, function() {
                $(this).text("Animasi 1 Selesai!");
            });
        } else {
            $("#animateDiv").animate({
                width: "100px",
                height: "100px",
                opacity: 1,
                borderRadius: "50%",
                backgroundColor: "#45b7d1"
            }, 1000, function() {
                $(this).text("Animasi 2 Selesai!");
            });
        }
        isFirstAnimation = !isFirstAnimation;
    });

    // Initialize datepicker
    $("#datepicker").datepicker();

    // Smooth scrolling for all links
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });

    // JQUERY EVENTS
    $("#newTextInput").on("keyup", function(event) {
        if (event.keyCode === 13) { // Enter key
            $("#changeTextBtn").click();
        }
    });

    // Log untuk debugging
    console.log("Toggle Button:", $("#toggleBtn").length);
    console.log("Hide/Show Div:", $("#hideShowDiv").length);
});

function displayResults(results) {
    var resultsHtml = "<h3>Hasil Pencarian:</h3>";
    if (results.length === 0) {
        resultsHtml += "<p>Tidak ada buku yang ditemukan.</p>";
    } else {
        resultsHtml += "<ul>";
        results.forEach(function(book) {
            resultsHtml += "<li>" + book.title + " oleh " + book.author + " (Tanggal: " + book.date + ")</li>";
        });
        resultsHtml += "</ul>";
    }
    $("#searchResults").html(resultsHtml);
}
