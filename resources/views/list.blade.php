@foreach ($students as $student)
    <li class="list-group-item">
        <div class="p-3">
            <span>{{ $student->id.'. ' }}</span>
            <b>{{ $student->name }}</b> 
            <a class="link-opacity-75-hover" href="#">{{ $student->email }}</a>
        </div>
    </li>
@endforeach