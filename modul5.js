document.addEventListener('DOMContentLoaded', function() {
    // Variables
    const books = [
      { 
        title: "Home Sweet Loan", 
        author: "Dan Ariely",
        description: "Sebuah novel tentang perjalanan seorang wanita muda dalam mencari rumah impiannya di tengah kompleksitas pasar properti dan sistem pinjaman.",
        totalCopies: 5,
        availableCopies: 3,
        genre: "Fiction",
        rating: 4.2
      },
      { 
        title: "The Chronicles of Narnia #2", 
        author: "C.S. Lewis",
        description: "Petualangan magis empat bersaudara di dunia fantasi Narnia, melawan Penyihir Putih dan membantu Aslan sang singa.",
        totalCopies: 8,
        availableCopies: 6,
        genre: "Fantasy",
        rating: 4.7
      },
      { 
        title: "Atomic Habits", 
        author: "James Clear",
        description: "Buku self-help yang mengajarkan cara membangun kebiasaan baik dan menghilangkan kebiasaan buruk melalui perubahan kecil sehari-hari.",
        totalCopies: 10,
        availableCopies: 2,
        genre: "Self-Help",
        rating: 4.8
      },
      { 
        title: "3726 MDPL", 
        author: "Ziggy Zezsyazeoviennazabrizkie",
        description: "Novel yang mengisahkan petualangan pendakian gunung dengan twist supernatural yang menegangkan.",
        totalCopies: 3,
        availableCopies: 1,
        genre: "Adventure",
        rating: 4.3
      },
      { 
        title: "The Apothecary Diaries 12", 
        author: "Natsu Hyuuga",
        description: "Seri light novel yang mengikuti kisah Maomao, seorang apoteker muda, dalam intrik politik istana kekaisaran Cina kuno.",
        totalCopies: 4,
        availableCopies: 4,
        genre: "Historical Fiction",
        rating: 4.6
      },
      { 
        title: "One Punch Man 27", 
        author: "ONE",
        description: "Manga komedi aksi tentang Saitama, pahlawan yang bisa mengalahkan musuh dengan satu pukulan, namun berjuang mencari tantangan sejati.",
        totalCopies: 6,
        availableCopies: 0,
        genre: "Manga",
        rating: 4.9
      }
    ];
  
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const searchResults = document.getElementById('searchResults');
  
    // Function to display book information
    function displayBookInfo(book) {
      // Operator: Subtraction
      const borrowedCopies = book.totalCopies - book.availableCopies;
      
      // Conditional structure: Ternary operator
      const availabilityStatus = book.availableCopies > 0 ? "Tersedia" : "Tidak Tersedia";
      
      // Conditional structure: If-else
      let ratingClass = "";
      if (book.rating >= 4.5) {
        ratingClass = "high-rating";
      } else if (book.rating >= 4.0) {
        ratingClass = "medium-rating";
      } else {
        ratingClass = "low-rating";
      }
  
      return `
        <strong>${book.title}</strong> oleh ${book.author}<br>
        <em>${book.description}</em><br>
        Genre: ${book.genre}<br>
        Status: ${availabilityStatus}<br>
        Total Buku: ${book.totalCopies}<br>
        Buku Tersedia: ${book.availableCopies}<br>
        Buku Dipinjam: ${borrowedCopies}<br>
        Rating: <span class="${ratingClass}">${book.rating.toFixed(1)}</span>
      `;
    }
  
    // Search functionality
    function searchBooks() {
      const searchTerm = searchInput.value.trim().toLowerCase();
      
      if (searchTerm === '') {
        searchResults.innerHTML = '';
        return;
      }
  
      // Loop: Filter using array method (which uses a loop internally)
      const results = books.filter(book => 
        book.title.toLowerCase().includes(searchTerm) || 
        book.author.toLowerCase().includes(searchTerm) ||
        book.genre.toLowerCase().includes(searchTerm)
      );
  
      displaySearchResults(results);
    }
  
    function displaySearchResults(results) {
      searchResults.innerHTML = '';
      const ul = document.createElement('ul');
      ul.style.listStyleType = 'none';
      ul.style.padding = '0';
  
      if (results.length === 0) {
        const li = document.createElement('li');
        li.style.marginBottom = '20px';
        li.style.backgroundColor = '#f0f0f0';
        li.style.padding = '10px';
        li.style.borderRadius = '5px';
        li.style.color = '#333';
        li.innerHTML = '<p>Tidak ada buku yang ditemukan.</p>';
        ul.appendChild(li);
      } else {
        // Loop: forEach
        results.forEach(book => {
          const li = document.createElement('li');
          li.style.marginBottom = '20px';
          li.style.backgroundColor = '#f0f0f0';
          li.style.padding = '10px';
          li.style.borderRadius = '5px';
          li.style.color = '#333';
          
          li.innerHTML = displayBookInfo(book);
          ul.appendChild(li);
        });
      }
      searchResults.appendChild(ul);
    }
  
    // Event listeners
    searchButton.addEventListener('click', searchBooks);
    searchInput.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        searchBooks();
      }
    });
  
    // Additional feature: Display all books on page load
    displaySearchResults(books);
  });
  