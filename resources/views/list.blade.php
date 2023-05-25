@foreach ($students as $student)
    <li class="list-group-item p-3">
        <b>{{ $student->name }}</b> 
        <a class="link-opacity-75-hover" href="#">{{ $student->email }}</a>
    </li>
@endforeach