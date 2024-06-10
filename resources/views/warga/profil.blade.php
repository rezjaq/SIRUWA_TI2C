@extends('layouts.app')

@section('title', 'Profil Warga')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-custom text-white">
                    <h3 class="card-title">Detail Profil Warga</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nomor Induk Kependudukan:</label>
                            <input type="text" class="form-control" value="{{ $warga->nik }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama:</label>
                            <input type="text" class="form-control" value="{{ $warga->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin:</label>
                            <input type="text" class="form-control" value="{{ $warga->jenis_kelamin }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir:</label>
                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($warga->tanggal_lahir)->isoFormat('D MMMM YYYY') }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat:</label>
                            <input type="text" class="form-control" value="{{ $warga->alamat }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon:</label>
                            <input type="text" class="form-control" value="{{ $warga->no_telepon }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama:</label>
                            <input type="text" class="form-control" value="{{ $warga->agama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Kawin:</label>
                            <input type="text" class="form-control" value="{{ $warga->statusKawin }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan:</label>
                            <input type="text" class="form-control" value="{{ $warga->pekerjaan }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor RT:</label>
                            <input type="text" class="form-control" value="{{ $warga->no_rt }}" disabled>
                        </div>
                    </form>
                    <button class="btn btn-primary mt-3" onclick="showChangePasswordAlert()">Ganti Password</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        .bg-custom {
            background-color: #03774A !important;
        }
        .card-header {
            border-bottom: none;
        }
        .card {
            border-radius: 10px;
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 0;
        }
        .password-custom .input-group-append button {
    border: none;
    background-color: #03774A; /* Updated color */
    color: white;
    padding: 0.375rem 0.75rem;
    cursor: pointer;
}

.password-custom .input-group-append button:hover {
    background-color: #035C3F;
}

.password-custom .form-group label {
    font-weight: bold;
}

.password-custom .form-group small {
    display: block;
    margin-top: 0.25rem;
}

.password-custom .input-group {
    position: relative;
    width: 100%;
}

.password-custom .input-group-append {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    display: flex;
    align-items: center;
}

.password-custom .toggle-password {
    padding: 0.375rem;
    background-color: transparent;
    border: none;
    color: #6c757d;
    cursor: pointer;
}

.password-custom .toggle-password:hover {
    color: #343a40;
}
    </style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showChangePasswordAlert() {
        Swal.fire({
            title: 'Ganti Kata Sandi',
            html: `
                <div class="password-custom">
                    <form id="changePasswordForm">
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-password" data-toggle="#password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="password-strength"></div>
                            <small class="form-text text-muted">Contoh: StrongP@ssw0rd!</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-password" data-toggle="#password_confirmation">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            `,
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ganti Password',
            preConfirm: () => {
                const password = Swal.getPopup().querySelector('#password').value;
                const password_confirmation = Swal.getPopup().querySelector('#password_confirmation').value;
                if (!password || !password_confirmation) {
                    Swal.showValidationMessage('Harap masukkan kedua bidang password');
                } else if (password !== password_confirmation) {
                    Swal.showValidationMessage('Password tidak cocok');
                }
                return { password: password, password_confirmation: password_confirmation };
            },
            didOpen: () => {
                const passwordInput = Swal.getPopup().querySelector('#password');
                const passwordConfirmationInput = Swal.getPopup().querySelector('#password_confirmation');
                const toggleButtons = Swal.getPopup().querySelectorAll('.toggle-password');
                const passwordStrengthDiv = Swal.getPopup().querySelector('#password-strength');

                toggleButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const input = Swal.getPopup().querySelector(button.getAttribute('data-toggle'));
                        if (input.type === 'password') {
                            input.type = 'text';
                            button.innerHTML = '<i class="fas fa-eye-slash"></i>';
                        } else {
                            input.type = 'password';
                            button.innerHTML = '<i class="fas fa-eye"></i>';
                        }
                    });
                });

                passwordInput.addEventListener('input', () => {
                    const strength = getPasswordStrength(passwordInput.value);
                    passwordStrengthDiv.innerHTML = `Strength: ${strength}`;
                    passwordStrengthDiv.style.color = getPasswordStrengthColor(strength);
                });
            }
        }).then((result) => {
            if (result.isConfirmed) {
                changePassword(result.value.password, result.value.password_confirmation);
            }
        });
    }

    function changePassword(password, password_confirmation) {
        fetch('{{ route('post-change-password') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ password: password, password_confirmation: password_confirmation })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Berhasil',
                    text: data.message,
                    icon: 'success'
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message,
                    icon: 'error'
                });
            }
        }).catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'Terjadi kesalahan!',
                icon: 'error'
            });
        });
    }

    function getPasswordStrength(password) {
        let strength = "Weak";
        const regex = {
            lower: /[a-z]/,
            upper: /[A-Z]/,
            number: /[0-9]/,
            special: /[!@#$%^&*(),.?":{}|<>]/
        };
        let passedTests = 0;

        if (regex.lower.test(password)) passedTests++;
        if (regex.upper.test(password)) passedTests++;
        if (regex.number.test(password)) passedTests++;
        if (regex.special.test(password)) passedTests++;
        if (password.length >= 8) passedTests++;

        switch (passedTests) {
            case 5:
                strength = "Very Strong";
                break;
            case 4:
                strength = "Strong";
                break;
            case 3:
                strength = "Medium";
                break;
            default:
                strength = "Weak";
                break;
        }

        return strength;
    }

    function getPasswordStrengthColor(strength) {
        switch (strength) {
            case "Very Strong":
                return "green";
            case "Strong":
                return "blue";
            case "Medium":
                return "orange";
            default:
                return "red";
        }
    }
</script>
@endpush
