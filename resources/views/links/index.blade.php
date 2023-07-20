@extends('layouts.app')

@section('content')
    <section class="h-100 gradient-form" style="background-color: rgb(95, 138, 224);"ner py-5 h-100">
        <div class="container py-5 h-100">
            <div class="col-md-12 offset-md-12">
                <div class="card cascading-right"
                    style=" background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);

                    ">
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('user.show', auth()->user()->username_slug) }}"
                                target="_blank">Add
                                Your Link</a></h4>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Total visits</th>
                                    <th>Last visit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $link->name }}</td>
                                        <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                                        <td>{{ $link->visits_count }}</td>
                                        <td>{{ $link->latest_visit ? $link->latest_visit->created_at->format('M j Y - H:ia') : 'N/A' }}
                                        </td>
                                        <td><a href="{{ route('links.edit', $link->id) }}">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($links->count() == 5)
                            <a href="javascript:void(0)"
                                class="btn btn-secondary {{ session('success') ? 'is-valid' : '' }}">Create new link</a>
                        @else
                            <a href="/dashboard/links/create"
                                class="btn btn-primary {{ session('success') ? 'is-valid' : '' }}">Create new link</a>
                        @endif

                        @if ($links->count() == 0)
                            <a href="javascript:void(0)" class="btn btn-secondary">Copy your links</a>
                        @else
                            <a onclick="copy()" href="javascript:void(0)" class="btn btn-success" id="copyLinks"
                                data-href="{{ route('user.show', auth()->user()->username_slug) }}">Copy your links</a>
                        @endif

                        @if (session('success'))
                            <div class="valid-feedback">{{ session('success') }}</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    //script for copy link to clipboard
    function copy() {
        let dummy = document.createElement('input');
        let href = $('#copyLinks').attr('data-href');

        document.body.appendChild(dummy);
        dummy.value = href;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);

        alert('Your links copied to clipboard!');
    }
</script>
