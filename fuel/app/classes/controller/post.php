<?php
class Controller_Post extends Controller_Template{

	public function action_index()
	{
		$data['Posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('post');

		if ( ! $data['Post'] = Model_Post::find($id))
		{
			Session::set_flash('error', 'Could not find Post #'.$id);
			Response::redirect('post');
		}

		$this->template->title = "Post";
		$this->template->content = View::forge('post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');
			
			if ($val->run())
			{
				$Post = Model_Post::forge(array(
					// 'id' => Input::post('id'),
					'title' => Input::post('title'),
					'body' => Input::post('body'),
				));

				if ($Post and $Post->save())
				{
					Session::set_flash('success', 'Added Post #'.$Post->id.'.');

					Response::redirect('post');
				}

				else
				{
					Session::set_flash('error', 'Could not save Post.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('post/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('post');

		if ( ! $Post = Model_Post::find($id))
		{
			Session::set_flash('error', 'Could not find Post #'.$id);
			Response::redirect('post');
		}

		$val = Model_Post::validate('edit');

		if ($val->run())
		{
			$Post->id = Input::post('id');
			$Post->title = Input::post('title');
			$Post->body = Input::post('body');

			if ($Post->save())
			{
				Session::set_flash('success', 'Updated Post #' . $id);

				Response::redirect('post');
			}

			else
			{
				Session::set_flash('error', 'Could not update Post #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$Post->id = $val->validated('id');
				$Post->title = $val->validated('title');
				$Post->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('Post', $Post, false);
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('post/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('post');

		if ($Post = Model_Post::find($id))
		{
			$Post->delete();

			Session::set_flash('success', 'Deleted Post #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete Post #'.$id);
		}

		Response::redirect('post');

	}


}
