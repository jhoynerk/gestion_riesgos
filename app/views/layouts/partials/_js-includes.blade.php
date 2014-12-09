<script src="{{url()}}/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{url()}}/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{url()}}/js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="{{url()}}/js/plugins/morris/raphael.min.js"></script>
<script src="{{url()}}/js/plugins/morris/morris.min.js"></script>
<script src="{{url()}}/js/plugins/morris/morris-data.js"></script>

<!-- Datatable -->

<script src="{{url()}}/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="{{url()}}/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Chosen -->
{{ HTML::script('js/plugins/chosen/chosen.jquery.js')}}

<script src="{{url()}}/js/sb-admin-2.js"></script>
	<!-- Custom Theme JavaScript -->
@yield('script')
