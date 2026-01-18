export interface User {
  id: number;
  name: string;
  email: string;
  email_verified_at?: string;
  created_at: string;
  updated_at: string;
  roles?: Role[];
}

export interface Role {
  id: number;
  name: string;
  display_name: string;
  description?: string;
}

export interface Permission {
  id: number;
  name: string;
  display_name: string;
  description?: string;
}

export interface ApiError {
  message?: string;
  errors?: Record<string, string[]>;
}

export interface LoginResponse {
  token: string;
  user?: User;
}

export interface ApiResponse<T = unknown> {
  success: boolean;
  message: string;
  data?: T;
  errors?: ApiError;
}
