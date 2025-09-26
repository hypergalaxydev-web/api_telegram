SELECT setval('chat_id_seq', coalesce(max(id),0) + 1, false) FROM chat;
SELECT setval('usuario_chat_id_seq', coalesce(max(id),0) + 1, false) FROM usuario_chat;