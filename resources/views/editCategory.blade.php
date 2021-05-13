                                 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
                                 <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <form method='post' action="{{ route('updateCategory') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $edit->id }}">
                                        <label> nazwa:    </label> <input type="text" name="category" value="{{ $edit->category }}" class="form-control"/>  <br/> <br/>
                                    </br>
                                    <input type="submit" name="edycja" value="zapisz"/>
                                    <a href="{{ url('/categoryAdd') }}">Cofnij</a>
                                </form>
                                </div>