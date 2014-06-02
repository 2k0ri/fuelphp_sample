
num_posts = 100
num_comments = 500
f = open('./seed.sql', 'w')

1.upto(num_posts) do |i|
  title = "タイトルなんだなこれが#{sprintf('%04d', i)}"
  body = "本文なんだなこれが#{sprintf('%04d', i)}"
  f.puts "INSERT INTO posts(title, body) VALUES(\"#{title}\", \"#{body}\");"
end

1.upto(num_comments) do |i|
  comment = "コメントなんだよね、これ#{sprintf('%03d', i)}"
  f.puts "INSERT INTO comments(post_id, comment) VALUES(\"#{i % num_posts + 1}\", \"#{comment}\");"
end

f.close
