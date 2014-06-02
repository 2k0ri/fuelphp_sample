<?php
class Controller_Comment extends Controller_Template{

	public function action_index()
	{
		$data['comments'] = Model_Comment::find('all');
		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('comment');

		if ( ! $data['comment'] = Model_Comment::find($id))
		{
			Session::set_flash('error', 'Could not find comment #'.$id);
			Response::redirect('comment');
		}

		$this->template->title = "Comment";
		$this->template->content = View::forge('comment/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Comment::validate('create');
			
			if ($val->run())
			{
				$comment = Model_Comment::forge(array(
					'id' => Input::post('id'),
					'post_id' => Input::post('post_id'),
					'comment' => Input::post('comment'),
				));

				if ($comment and $comment->save())
				{
					Session::set_flash('success', 'Added comment #'.$comment->id.'.');

					Response::redirect('comment');
				}

				else
				{
					Session::set_flash('error', 'Could not save comment.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('comment');

		if ( ! $comment = Model_Comment::find($id))
		{
			Session::set_flash('error', 'Could not find comment #'.$id);
			Response::redirect('comment');
		}

		$val = Model_Comment::validate('edit');

		if ($val->run())
		{
			$comment->id = Input::post('id');
			$comment->post_id = Input::post('post_id');
			$comment->comment = Input::post('comment');

			if ($comment->save())
			{
				Session::set_flash('success', 'Updated comment #' . $id);

				Response::redirect('comment');
			}

			else
			{
				Session::set_flash('error', 'Could not update comment #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$comment->id = $val->validated('id');
				$comment->post_id = $val->validated('post_id');
				$comment->comment = $val->validated('comment');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('comment', $comment, false);
		}

		$this->template->title = "Comments";
		$this->template->content = View::forge('comment/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('comment');

		if ($comment = Model_Comment::find($id))
		{
			$comment->delete();

			Session::set_flash('success', 'Deleted comment #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete comment #'.$id);
		}

		Response::redirect('comment');

	}


}
