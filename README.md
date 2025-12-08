# IGMG Türkiye Website

This project is the official website for IGMG (Islamische Gemeinschaft Millî Görüş) Türkiye, designed to provide information about the organization's activities, news, and services. It features a responsive design and an admin panel for content management.

## 📖 Description

The IGMG Türkiye Website serves as a digital hub for the organization, offering:
- **News & Announcements:** Up-to-date information on events and organizational news.
- **Organization Structure:** Details about the board, branches, and various departments (Youth, Women, etc.).
- **Interactive Map:** A visual representation of the organization's reach across Turkey.
- **Multimedia:** Photo and video galleries.
- **Contact Information:** Easy ways to get in touch with the organization.

## ✨ Features

- **Responsive Design:** Built with Bootstrap to ensure compatibility across desktops, tablets, and mobile devices.
- **Admin Panel:** A secure backend for administrators to manage news, events, and other dynamic content.
- **Dynamic Content:** News sliders, counters for statistics (Branches, Regions, Countries), and more.
- **Interactive Elements:** SVG map of Turkey with hover effects for city-specific information.
- **Modern UI:** Clean and professional interface using modern web design principles.

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript (jQuery), Bootstrap 4
- **Backend:** PHP
- **Database:** MySQL (implied for dynamic content management)
- **Libraries & Plugins:**
  - Owl Carousel (Sliders)
  - Magnific Popup (Lightboxes)
  - AOS (Animate On Scroll)
  - Open Iconic & Ionicons (Icons)

## 🚀 Installation & Setup

To run this project locally on your machine using XAMPP:

1.  **Prerequisites:**
    - Download and install [XAMPP](https://www.apachefriends.org/index.html) (includes Apache and MySQL).

2.  **Clone/Download:**
    - Clone this repository or download the ZIP file.
    - Place the project folder into your XAMPP `htdocs` directory (usually `C:\xampp\htdocs\`).
    - Rename the folder to `IGMG-Website` (or your preferred name).

3.  **Database Setup:**
    - Start **Apache** and **MySQL** from the XAMPP Control Panel.
    - Go to `http://localhost/phpmyadmin`.
    - Create a new database (e.g., `igmg_db`).
    - Import the SQL file if provided in the project files (check for a `.sql` file in the root or `db` folder). *Note: If no SQL file is present, the dynamic features might need database configuration.*
    - Update the database connection settings in the project's configuration file (commonly `inc/config.php`, `db.php`, or similar) to match your local database credentials.

4.  **Run the Application:**
    - Open your web browser.
    - Navigate to `http://localhost/IGMG-Website`.

## 📂 Project Structure

- `admin/`: Contains the admin panel files.
- `css/`: Stylesheets for the frontend.
- `fonts/`: Font files and icon sets.
- `images/`: Image assets.
- `inc/`: Includes (header, footer, database connection).
- `js/`: JavaScript files.
- `scss/`: Sass source files for styling.
- `*.php`: Main pages of the website (index, about, contact, etc.).

## 🤝 Credits

- Template based on Colorlib (as noted in `readme.txt`).
- Customized and developed for IGMG Türkiye.

## 📄 License

This project is proprietary to IGMG Türkiye. Please refer to the `readme.txt` for template-specific licensing information regarding Colorlib.