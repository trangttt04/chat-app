<div class="right-sidebar" id="settings">
    <div class="right-sidebar-header">
        <span class="right-sidebar-title">Cài đặt</span>
        <a href="#" class="right-sidebar-close">
            <i class="mdi mdi-window-close"></i>
        </a>
    </div>
    <div class="right-sidebar-content">
        <ul class="list-group list-group-flush">
            @foreach($roles as $role)
            <li class="list-group-item py-3 px-0">
                <div class="form-item custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" value="{{ $role->id }}" {{ auth()->user()->roles->contains('id', $role->id) ? 'checked' : '' }} id="customSwitch{{$loop->index + 1}}">
                    <label class="custom-control-label" for="customSwitch{{$loop->index + 1}}">{{$role->name}}</label>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@push('script')
    <script>
        $(document).on('change','.custom-control-input',function(){
            let id = $(this).val();
            axios.post("{{route('toggle.roles')}}",{id: id})
                .then(response => {
                    console.log(response);
                })
        })
    </script>
@endpush
