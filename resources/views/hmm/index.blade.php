@extends('layouts')
    <!-- <table class="table table-bordered" id="test">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table> -->

    <table class="table table-hover" id="test">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Created At</th>
                <th>Updated At</th>
               </tr>
            </thead>
         </table>
@push('scripts')
<script>
$(function() {
    $('#test').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/adooch/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush