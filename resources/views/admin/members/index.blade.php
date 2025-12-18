@extends('layouts.admin')

@section('title', 'Üyelik Başvuruları')

@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Başvurular ve İletişim</h3></div>
    </div>
</div>
@endsection

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
                <a class="nav-link {{ $status == 'new' ? 'active' : '' }}" href="{{ route('admin.members.index', ['status' => 'new']) }}">
                    Yeni Başvurular 
                    <span class="badge text-bg-warning ms-1">{{ \App\Models\Member::where('status', 'new')->count() }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $status == 'contacted' ? 'active' : '' }}" href="{{ route('admin.members.index', ['status' => 'contacted']) }}">
                    İletişime Geçilenler
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Tarih</th>
                        <th>Ad Soyad</th>
                        <th>İletişim</th>
                        <th>Mesaj</th>
                        <th colspan="2" style="width: 350px;">Yönetici Notu & Durum & İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                    <tr>
                        <td>{{ $member->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $member->name }}</td>
                        <td>
                            <div><i class="bi bi-envelope"></i> {{ $member->email }}</div>
                            @if($member->phone)
                            <div><i class="bi bi-phone"></i> {{ $member->phone }}</div>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="popover" title="Mesaj" data-bs-content="{{ $member->message }}">
                                Oku
                            </button>
                            <span class="d-none">{{ $member->message }}</span>
                        </td>
                        <td colspan="2">
                            <form action="{{ route('admin.members.update', $member) }}" method="POST" class="member-update-form">
                                @csrf
                                @method('PUT')
                                <textarea name="admin_note" class="form-control form-control-sm mb-2" placeholder="Not ekle..." rows="2">{{ $member->admin_note }}</textarea>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="status" id="new_{{ $member->id }}" value="new" {{ $member->status == 'new' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-warning btn-sm" for="new_{{ $member->id }}">Yeni</label>
            
                                        <input type="radio" class="btn-check" name="status" id="contacted_{{ $member->id }}" value="contacted" {{ $member->status == 'contacted' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-success btn-sm" for="contacted_{{ $member->id }}">İletişildi</label>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-sm btn-primary me-1"><i class="bi bi-floppy"></i> Kaydet</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger delete-member-btn" data-url="{{ route('admin.members.destroy', $member) }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Kayıt bulunamadı.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $members->appends(['status' => $status])->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
          return new bootstrap.Popover(popoverTriggerEl)
        });

        // Optional: AJAX update for member forms
        document.querySelectorAll('.member-update-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const btn = this.querySelector('button[type="submit"]');
                const originalText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '...';

                fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(r => r.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                    if(data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Güncellendi',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                    alert('Hata oluştu');
                });
            });
        });

        // Delete Member
        document.querySelectorAll('.delete-member-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Bu başvuru kalıcı olarak silinecek!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Evet, Sil!',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(r => r.json())
                        .then(data => {
                            if(data.success) {
                                Swal.fire(
                                    'Silindi!',
                                    data.message,
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire('Hata', 'Silinemedi.', 'error');
                            }
                        })
                        .catch(err => {
                            Swal.fire('Hata', 'Sistem hatası.', 'error');
                        });
                    }
                });
            });
        });
    });
</script>
@endsection
