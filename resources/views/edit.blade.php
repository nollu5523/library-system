               <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <form method='post' action="{{ route('update') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $edit->id }}">
                                        <label> isbn:    </label> <input type="text" name="isbn" value="{{ $edit->isbn }}" class="form-control"/>  <br/>
                                        <label> title:    </label> <input type="text" name="title" value="{{ $edit->title }}" class="form-control"/>  <br/>
                                        <label> opis:    </label> <input type="text" name="description" value="{{ $edit->description }}" class="form-control"/>  <br/>
                                        <label> kategoria:    </label> <input type="text" name="category_id" value="{{ $edit->category_id }}" class="form-control"/>  <br/>
                                        <label> publish id:    </label> <input type="text" name="publishing_id" value="{{ $edit->publishing_id }}" class="form-control"/>  <br/>
                                    </br>
                                    <input type="submit" name="edycja" value="zapisz"/>
                                </form>
                                </div>