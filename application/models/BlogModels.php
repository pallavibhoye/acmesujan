

<?php


class BlogModels extends CI_Model
    {
    	 function create($allblogs)
    	 {
    	 	return $this->db->insert('blog',$allblogs);
    	 }

    	 function getAllBlogs()
    	 {
    	 	 $blog =$this->db->get('blog')->result_array();
    	 	return $blog;
    	 }

        function editBlog($id,$array){
            $this->db->where('Blog-id',$id);
           return $this->db->update('blog', $array);
        }


         function getblog($id){
            $this->db->where('Blog-id',$id);
            $blog = $this->db->get('blog')->row_array();
            return  $blog;
         }

          function deleteBlog($id){
            $this->db->where('Blog-id',$id);
          return   $this->db->delete('blog');
        }

    	
	}

	?>