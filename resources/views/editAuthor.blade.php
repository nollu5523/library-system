                                 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
                                 <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <form method='post' action="{{ route('updateAuthor') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $edit->id }}">
                                        <label> imie:    </label> <input type="text" name="name" value="{{ $edit->name }}" class="form-control"/>  <br/>
                                        <label> nazwisko:    </label> <input type="text" name="surname" value="{{ $edit->surname }}" class="form-control"/>  <br/>
                                    </br>
                                    <input type="submit" name="edycja" value="zapisz"/>
                                    <a href="{{ url('/authorAdd') }}">Cofnij</a>
                                </form>
                                </div>