@extends('home.base')

@section('content')
<div class="container">
    @foreach ($categories as $cat)
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-capitalize h4 text-secondary">{{$cat->cat_title}}</h2>
                </div>
            </div>
            <div class="row">
                <hr>
                @foreach ($cat->products as $item)
                    <div class="col-3 g-3">
                        <div class="card h-100">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="" class="w-100"
                                        style="height:100px;object-fit:cover">
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-2 d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="mb-1">{{$item->title}}</h6>
                                            <p class="small text-muted mb-2">{{$item->description}}</p>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="text-success fw-bold">{{$item->price}} DT</span>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="text-success"><i class="fas fa-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endforeach
    <hr>

    <!-- feedback -->

    <div class="container my-5">
        <h3>We Value Your Feedback</h3>
        <form action="{{ route('feedback.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Feedback</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
    <!-- Display Feedback -->
    <div class="container my-5">
        <h3>Feedback</h3>
        @forelse($feedbacks as $feedback)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $feedback->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $feedback->email }}</h6>
                    <p class="card-text">{{ $feedback->message }}</p>
                    
                    <form action="{{ route('feedback.delete', $feedback->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No feedbacks available.</p>
        @endforelse
    </div>

    <!-- Footer -->
    <div>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Term</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">Privacy</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">FAQs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-muted">About</a>
                </li>
            </ul>
            <p class="text-center text-muted">&copy; 2024 Foodie</p>
        </footer>
    </div>
</div>
@endsection