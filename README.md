# IGMG Türkiye Web Projesi

Bu proje, IGMG Türkiye için geliştirilmiş, Laravel altyapısını kullanan kurumsal web sitesi ve yönetim panelidir.

## 🚀 Özellikler

### 1. Haber & İçerik Yönetimi
- **AJAX Tabanlı Yönetim**: Sayfa yenilemeden haber ekleme, düzenleme ve silme.
- **Görsel Yükleme**: Otomatik boyutlandırma ve doğrulama.
- **Dinamik Ön Yüz**: Haberler anasayfa ve haberler sayfasında otomatik listelenir.

### 2. Üyelik & İletişim Sistemi
- **Hızlı Başvuru**: Anasayfa ve İletişim sayfasında AJAX tabanlı "Üye Ol" formu.
- **Anlık Geri Bildirim**: PNotify entegrasyonu ile başarılı/hatalı işlem bildirimleri.
- **Yönetim Paneli**:
    - **Filtreleme**: "Yeni Başvurular" ve "İletişime Geçilenler" sekmeleri.
    - **Durum Güncelleme**: Yönetici notu ekleme ve statü değiştirme (Tek tıkla "İletişildi" yapma).
    - **Silme**: Gereksiz başvuruları kalıcı olarak silme özelliği.

### 3. Yönetim Paneli (AdminLTE)
- **Güvenli Giriş**: E-posta ve şifre ile korunan yönetim paneli. (Beni Hatırla özelliği aktif)
- **Mobil Uyumlu**: Tam responsive sidebar ve arayüz.
- **Modern Arayüz**: SweetAlert2 ve AJAX ile güçlendirilmiş kullanıcı deneyimi.

## 🛠 Kurulum

Proje **XAMPP / PHP 8.2+** ortamında çalışacak şekilde yapılandırılmıştır.

1. **Repoyu Klonlayın**
   ```bash
   git clone https://github.com/kullaniciadi/proje.git
   cd proje
   ```

2. **Bağımlılıkları Yükleyin**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **.env Dosyasını Ayarlayın**
   Dosya kök dizinindeki `.env.example` dosyasını kopyalayıp `.env` yapın ve veritabanı bilgilerinizi girin.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Veritabanını Oluşturun**
   ```bash
   php artisan migrate
   ```

5. **Storage Bağlantısı**
   Görsellerin görünmesi için symbolic link oluşturun:
   ```bash
   php artisan storage:link
   ```

6. **Projeyi Başlatın**
   ```bash
   php artisan serve
   ```

## 🔐 Yönetici Bilgileri

> **Not:** Varsayılan yönetici hesabı migration (seeder) ile gelmektedir.

- **E-Posta:** `admin@igmgturkiye.com` (veya veritabanındaki admin kullanıcı)
- **Şifre:** `password` (Varsayılan Laravel şifresi)

## 📱 İletişim & Destek

Geliştirici ekibi ile iletişime geçmek için proje yöneticisine başvurun.

---
*IGMG Türkiye Bilişim Birimi*
